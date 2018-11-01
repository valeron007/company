<?
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 12.10.18
 * Time: 0:32
 */

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Company;

$routes = new RouteCollection();

$routes->add('employee_delete', new Route(
	'/employee/delete/{id}', array(
		'_controller' => [Company\Employee::class, 'delete']
	)

));

return $routes;

