<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Grades\GradeRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Students\StudentRepository;
use App\Repository\Teachers\TeacherRepository;
use App\Interface\Grades\GradeRepositoryInterface;
use App\Repository\Classrooms\ClassroomRepository;
use App\Interface\Sections\SectionRepositoryInterface;
use App\Interface\Students\StudentRepositoryInterface;
use App\Interface\Teachers\TeacherRepositoryInterface;
use App\Interface\Classrooms\ClassroomRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(GradeRepositoryInterface::class, GradeRepository::class);
        $this->app->bind(ClassroomRepositoryInterface::class, ClassroomRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
