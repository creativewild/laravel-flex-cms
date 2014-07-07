<?php namespace HugoKalidas\LaravelFlexCms\Accounts;
use HugoKalidas\LaravelFlexCms\Core\EloquentBaseRepository;

class UserRepository extends EloquentBaseRepository implements UserInterface
{

    /**
     * Construct Shit
     * @param User $user
     */
    public function __construct( User $user )
    {
        $this->model = $user;
    }

}