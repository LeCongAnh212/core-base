<?php

namespace App\Services\User;

use App\Interfaces\User\UserRepositoryInterface;
use App\Services\BaseService;
use Illuminate\Support\Facades\Log;

class FindUserService extends BaseService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle()
    {
        try {
            return $this->userRepository->find($this->data);
        } catch (\Throwable $th) {
            //throw $th;
            Log::info($th);

            return false;
        }
    }

}
