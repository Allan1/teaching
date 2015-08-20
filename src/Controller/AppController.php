<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display'
            ]
        ]);

        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow(['display']);
    }

    public function getUserRole($user_id=null)
    {
        if (!$user_id) {
            $user = $this->Auth->user();
            return $user['role'];
        }
        $this->loadModel('Administrators');
        $user = $this->Administrators->find('all',['conditions'=>['user_id'=>$user_id]]);
        $user = $user->first();
        if ($user) 
            return 'Administrator';

        $this->loadModel('Professors');
        $user = $this->Professors->find('all',['conditions'=>['user_id'=>$user_id]]);
        $user = $user->first();
        if ($user) 
            return 'Professor';

        return 'Student';
    }

    public function getStudentId() {
        $user = $this->Auth->user();
        if ($this->getUserRole() == 'Student') {
            $this->loadModel('Students');
            $student = $this->Students->find('all',['conditions'=>['user_id'=>$user['id']]]);
            $student = $student->first();
            return $student['id'];
        }
        return null;
    }

    public function beforeFilter(Event $event)
    {
        // $this->loadModel('Users');
        // $user = $this->Users->get(1);
        // debug($this->getUserRole());
    }
}