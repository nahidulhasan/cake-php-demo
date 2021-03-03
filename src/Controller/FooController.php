<?php

namespace App\Controller;

use App\Model\Entity\Product;
use Rest\Controller\RestController;

/**
 * Foo Controller
 *
 */
class FooController extends RestController
{



    /**
     * bar method
     *
     * @return Response|void
     */
    public function bar()
    {
        $bar = [
            'falanu' => [
                'dhikanu',
                'tamburo'
            ]
        ];

       $this->set(compact('bar'));


    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod('post');

        $this->loadModel('Products');

        $product = $this->Products->newEntity($this->request->getData());

        try {
            if ($this->Products->save($product)) {
                $result['status_code'] = 201;
                $result['message'] = 'Registered successfully.';

            } else {
                $result['status_code'] = 400;
                $result['message'] = 'Unable to register user.';

            }
        } catch (Exception $e) {
            $result['status_code'] = 400;
            $result['message'] = 'Unable to register user.';
        }

        $this->set(compact('result'));

    }


}
