<?php

namespace Tests\Feature\App\Repositories\Eloquent;

use App\Models\Marvel;
use App\Repositories\Eloquent\MarvelRepository;
use App\Repositories\MarvelRepositoryInterface;
use Illuminate\Database\QueryException;
use Tests\TestCase;

class MarvelRepositoryTest extends TestCase
{
    protected $repository;

    protected function setUp(): void
    {
        $this->repository = new MarvelRepository(new Marvel());

        parent::setUp();
    }

    /**
     * @test
     */
    public function implements_interface()
    {
        $this->assertInstanceOf(
                MarvelRepositoryInterface::class,
                $this->repository
        );
    }

     /**
     * @test
     */
    public function store_exception()
    {
        $this->expectException(QueryException::class);

        $data = [
            'gender' => 'Wookiee',
            'president' => 'Chewbacca',
        ];

        $this->repository->store($data);
    }

    /** 
     * @test
     */
    public function store()
    {
        $data = [
            'gender' => 'Wookiee',
            'president' => 'Chewbacca',
            'localization' => 'Universo Expandido, Attichitcuk',
        ];

        $response = $this->repository->store($data);

        $this->assertNotNull($response);

        $this->assertIsObject($response);

        $this->assertDatabaseHas('marvels', [
            'president' => 'Chewbacca',
        ]);
    }


    /**
     * @test
     */
    public function find_all_empty()
    {
        $response = $this->repository->findAll();

        $this->assertCount(0, $response);
    }

    /**
     * @test
     */

     public function find_all()
     {
         Marvel::factory()->count(10)->create();
 
         $response = $this->repository->findAll();
 
         $this->assertCount(10, $response);
     }

     /**
      * @test
      */
      public function test_update()
    {
        $marvel = Marvel::factory()->create();

        $data = [
            'localization' => 'new localization',
        ];

        $response = $this->repository->update($marvel->uuid, $data);

        $this->assertNotNull($response);

        $this->assertIsObject($response);

        $this->assertDatabaseHas('marvels', [
            'localization' => 'new localization',
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $marvel = Marvel::factory()->create();

        $destroyed = $this->repository->destroy($marvel->uuid);

        $this->assertTrue($destroyed);

        $this->assertDatabaseMissing('marvels', [
            'uuid' => $marvel->uuid
        ]);
    }

    /**
     * @test
     */
    public function destroy_not_found()
    {
        $this->expectException(\Exception::class);

        $this->repository->findByUuid('fake_uuid');

    }

}
