<?php
 
     namespace src\Models;
     use src\Models\Articles\Article;
     use src\Services\Db;
     use ReflectionObject;
 
     abstract class ActiveRecordEntity{
         
         protected $id; // id статьи 
         public function getId() {  // получеине этого id
             return $this->id;
         }
 
         public function __set($name, $value) // рефлексия, необходимо для сопоставления полей БД со свойствами объекта
         {
             $camelCaseName = $this->underscoreToCamelcase($name); // преобразует имя свойства из snake_case в camelCase
             $this->$camelCaseName = $value; // тут устанавливаем значение 
         }
     
         private function underscoreToCamelcase(string $name): string // как раз тут преобразуем имена в нужный нам формат 
         {
             return lcfirst(str_replace('_','',ucwords($name, '_'))); // сначала все симовлы после '_' изменяем в верхний регистр, потом удаляем "_", и первую букву делаем в нижнем регистре 
         }
         
         private function camelCaseToUnderscore(string $source): string // а туть обратное преобразование 
         {
             return strtolower(preg_replace('/([A-Z])/', '_$1', $source)); // перед большими буквами ставим "_" и делаем слово в нижнем регистре
         }
 
         private function mapPropertiesToDb(): array // преобразуем свойства в массив для БД через рефлексиюс ReflectionObject
         {
             $reflector = new ReflectionObject($this); // создается объект ReflectionObject для текущего объекта
             $properties = $reflector->getProperties(); // получаем все свойства объекта 
             $mappedProperties = [];
             foreach($properties as $property){ // тут начинается перебор всех свойств
                 $propertyName = $property->getName(); // получаем имя свойства 
                 $propertyDbName = $this->camelCaseToUnderscore($propertyName); // преобразуем его 
                 $mappedProperties[$propertyDbName]= $this->$propertyName; //складываем все в массив
             }
             return $mappedProperties;
         }

         public static function findAll(): ?array // получение всех записей
         {
             $db = Db::getInstance();  // подключение к БД
             $sql = 'SELECT * FROM `'.static::getTableName().'`'; // формируем запрос и возвращаем в качестве массива объектов текущего класса
             return $db->query($sql, [], static::class);
         }
     
         public static function getById(int $id): ?static
         {
             if ($id <= 0) {
                 return null;
             }
             
             $db = Db::getInstance(); // подключение к БД
             $entities = $db->query(
                 'SELECT * FROM ' . static::getTableName() . ' WHERE id = :id', // формируем запрос
                 [':id' => $id], 
                 static::class // благодаря этому резульат будет преобразовываться в объект 
             );
             return $entities[0] ?? null; // возвращаем первый объект из результата
         }

         public function save()
         {
             if ($this->getId()) $this->update(); //если есть id, то выполняет update
             else $this->insert(); // если нет - insert
         }
     
         private function update(){
            $properties = $this->mapPropertiesToDb();
            $column2Params = [];
            $param2Value = [];
            foreach( $properties as $key=>$value){
                $column = '`'.$key.'`';
                $param = ':'.$key;
                $column2Params[] = $column.'='.$param;
                $param2Value[$param] = $value;
            }
            $sql = 'UPDATE `'.static::getTableName().'` SET '.implode(',', $column2Params).' WHERE `id`=:id';
            $db = Db::getInstance();
            $db->query($sql, $param2Value, static::class);
         }
     
         private function insert(){
            $properties = array_filter($this->mapPropertiesToDb());
            $columns = [];
            $params = [];
            $param2Value = [];
             foreach($properties as $key=>$val){
                 $columns[] = '`'.$key.'`';
                 $param = ':'.$key;
                 $params[] = $param;
                 $param2Value[$param] = $val;
             }
            $sql = 'INSERT INTO `'.static::getTableName().'`('.implode(',', $columns).') VALUES ('.implode(',', $params).')';
            $db = Db::getInstance();
            $db->query($sql, $param2Value, static::class);
         }
         
         public function delete()
     {
         $sql = 'DELETE FROM `'.static::getTableName().'` WHERE `id`=:id';
         $db = Db::getInstance();
         $db->query($sql, [':id'=>$this->id], static::class);
     }

         abstract protected static function getTableName(): string;
     }