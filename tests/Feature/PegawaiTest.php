<?php

namespace Tests\Feature;

use App\Models\Pegawai;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PegawaiTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_daftar_pegawai_dapat_dibuka(): void
    {
        $pegawai = Pegawai::factory()->create(['nama' => 'Siti Aminah', 'jabatan' => 'Kepala Gudang']);

        $this->get(route('pegawai.index'))
            ->assertOk()
            ->assertSee('Data Pegawai')
            ->assertSee($pegawai->nama)
            ->assertSee($pegawai->jabatan);
    }

    public function test_form_tambah_pegawai_dapat_dibuka(): void
    {
        $this->get(route('pegawai.create'))
            ->assertOk()
            ->assertSee('Tambah Pegawai');
    }

    public function test_pegawai_baru_dapat_disimpan(): void
    {
        $response = $this->post(route('pegawai.store'), [
            'nama' => 'Budi Santoso',
            'jabatan' => 'Staf Gudang',
            'email' => 'budi@example.com',
            'nomor_telepon' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 10',
        ]);

        $response->assertRedirect(route('pegawai.index'));
        $response->assertSessionHas('status');

        $this->assertDatabaseHas('pegawai', [
            'nama' => 'Budi Santoso',
            'jabatan' => 'Staf Gudang',
            'email' => 'budi@example.com',
        ]);
    }

    public function test_nama_dan_jabatan_wajib_diisi(): void
    {
        $response = $this->post(route('pegawai.store'), [
            'nama' => '',
            'jabatan' => '',
        ]);

        $response->assertSessionHasErrors(['nama', 'jabatan']);
        $this->assertDatabaseCount('pegawai', 0);
    }

    public function test_email_tidak_boleh_duplikat(): void
    {
        Pegawai::factory()->create(['email' => 'terdaftar@example.com']);

        $response = $this->post(route('pegawai.store'), [
            'nama' => 'Pegawai Lain',
            'jabatan' => 'Kurir',
            'email' => 'terdaftar@example.com',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertDatabaseCount('pegawai', 1);
    }
}
