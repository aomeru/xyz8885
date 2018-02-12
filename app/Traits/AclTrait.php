<?php
namespace App\Traits;

use Auth;
use App\User;
use App\Models\Log;
use App\Models\Page;
use App\Models\Permission;
use Session;

trait AclTrait
{

	protected $acl = [
		'allocation' => [
			'create' => ['itsupport','enta'],
			'edit' => ['itsupport','enta'],
			'view' => ['itsupport','enta'],
			'delete' => ['itsupport','enta'],
			'show' => ['itsupport','enta'],
		],
		'comment' => [
			'create' => ['itsupport','enta'],
			'edit' => ['itsupport','enta'],
			'view' => ['itsupport','enta'],
			'delete' => ['itsupport'],
			'show' => ['itsupport','enta'],
		],
		'department' => [
			'create' => ['itsupport','enta','cukaigwe','oakahara','iuzoeto','eejemai','jikwuka','speter','aalaba','aomeru'],
			'edit' => ['itsupport','enta','cukaigwe','oakahara','iuzoeto','eejemai','jikwuka','speter','aalaba','aomeru'],
			'view' => ['itsupport','enta','cukaigwe','oakahara','iuzoeto','eejemai','jikwuka','speter','aalaba','aomeru'],
			'delete' => ['itsupport'],
			'show' => ['itsupport','enta','cukaigwe','oakahara','iuzoeto','eejemai','jikwuka','speter','aalaba','aomeru'],
		],
		'ilog' => [
			'create' => ['itsupport','enta','cukaigwe'],
			'edit' => ['itsupport','enta','cukaigwe'],
			'view' => ['itsupport','cukaigwe','enta'],
			'delete' => ['itsupport'],
			'show' => ['itsupport','cukaigwe','enta'],
		],
		'inventory' => [
			'create' => ['itsupport','enta','cukaigwe'],
			'edit' => ['itsupport','enta','cukaigwe'],
			'view' => ['itsupport','enta','cukaigwe'],
			'delete' => ['itsupport'],
			'show' => ['itsupport','enta','cukaigwe'],
		],
		'item' => [
			'create' => ['itsupport','enta','cukaigwe'],
			'edit' => ['itsupport','enta','cukaigwe'],
			'view' => ['itsupport','enta','cukaigwe'],
			'delete' => ['itsupport'],
			'show' => ['itsupport','enta','cukaigwe'],
		],
		'log' => [
			'create' => ['itsupport'],
			'edit' => ['itsupport'],
			'view' => ['itsupport'],
			'delete' => ['itsupport'],
			'show' => ['itsupport'],
		],
		'plog' => [
			'create' => ['itsupport'],
			'edit' => ['itsupport'],
			'view' => ['itsupport'],
			'delete' => ['itsupport'],
			'show' => ['itsupport'],
		],
		'purchase' => [
			'create' => ['itsupport'],
			'edit' => ['itsupport'],
			'view' => ['itsupport'],
			'delete' => ['itsupport'],
			'show' => ['itsupport'],
		],
		'task' => [
			'create' => ['itsupport'],
			'edit' => ['itsupport'],
			'view' => ['itsupport'],
			'delete' => ['itsupport'],
			'show' => ['itsupport'],
		],
		'unit' => [
			'create' => ['itsupport','enta','cukaigwe','oakahara','iuzoeto','eejemai','jikwuka','speter','aalaba','aomeru'],
			'edit' => ['itsupport','enta','cukaigwe','oakahara','iuzoeto','eejemai','jikwuka','speter','aalaba','aomeru'],
			'view' => ['itsupport','enta','cukaigwe','oakahara','iuzoeto','eejemai','jikwuka','speter','aalaba','aomeru'],
			'delete' => ['itsupport'],
			'show' => ['itsupport','enta','cukaigwe','oakahara','iuzoeto','eejemai','jikwuka','speter','aalaba','aomeru'],
		],
		'user' => [
			'create' => ['itsupport','cukaigwe','enta','speter'],
			'edit' => ['itsupport','cukaigwe','enta','speter'],
			'view' => ['itsupport','cukaigwe','enta','speter'],
			'delete' => ['itsupport'],
			'show' => ['itsupport','cukaigwe','enta','speter'],
		],
	];

}
