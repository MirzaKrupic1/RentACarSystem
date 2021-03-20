<?php
require_once dirname(__FILE__)."/dao/BaseDao.class.php";

require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/services/UserService.class.php';
require_once dirname(__FILE__).'/services/CarService.class.php';
require_once dirname(__FILE__).'/services/CompanyService.class.php';

/* Error handling for API */
/*Flight::map('error', function(Exception $ex){
  Flight::json(["message" => $ex->getMessage()], $ex->getCode());
}); */

Flight::map('query', function($name, $default_value = NULL){
    $request = Flight::request();

    $query_param = @$request->query->getData()[$name];
    $query_param = $query_param ? $query_param : $default_value;
    return $query_param;
});

Flight::register('userservice', 'UserService');
Flight::register('carservice', 'CarService');
Flight::register('companyservice', 'CompanyService');

require_once dirname(__FILE__).'/routes/users.php';
require_once dirname(__FILE__).'/routes/cars.php';
require_once dirname(__FILE__).'/routes/companies.php';

Flight::start();
?>
