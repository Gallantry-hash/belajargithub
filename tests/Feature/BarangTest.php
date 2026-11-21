<?php

namespace Tests\Feature;

use App\Models\Barang;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class BarangTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_item_form_renders(): void
    {
        $response = $this->get(route('barang.create'));

        $response->assertOk();
        $response->assertSee('Tambah Barang');
        $response->assertSee('Nama Barang');
        $response->assertSee('Jumlah Stok Awal');
    }

    public function test_valid_item_is_created_and_redirects_to_list(): void
    {
        $response = $this->post(route('barang.store'), [
            'nama' => 'Kardus Karton 40x30',
            'kategori' => 'Kemasan',
            'satuan' => 'pcs',
            'lokasi_rak' => 'Rak A1',
            'stok' => 240,
        ]);

        $response->assertRedirect(route('barang.index'));
        $response->assertSessionHas('success', 'Barang berhasil ditambahkan.');

        $this->assertDatabaseHas('barangs', [
            'nama' => 'Kardus Karton 40x30',
            'kategori' => 'Kemasan',
            'satuan' => 'pcs',
            'lokasi_rak' => 'Rak A1',
            'stok' => 240,
        ]);
    }

    public function test_item_list_displays_saved_items(): void
    {
        $barang = Barang::factory()->create([
            'nama' => 'Lakban Bening 2 inci',
            'kategori' => 'Perlengkapan',
            'satuan' => 'roll',
            'lokasi_rak' => 'Rak B2',
            'stok' => 10,
        ]);

        $response = $this->get(route('barang.index'));

        $response->assertOk();
        $response->assertSee($barang->nama);
        $response->assertSee('10 roll');
        $response->assertSee('Menipis');
    }

    public function test_required_fields_are_validated(): void
    {
        $response = $this->post(route('barang.store'), []);

        $response->assertSessionHasErrors(['nama', 'kategori', 'satuan', 'lokasi_rak', 'stok']);
        $response->assertSessionHasErrors(['nama' => 'Nama barang wajib diisi.']);

        $this->assertDatabaseCount('barangs', 0);
    }

    /**
     * @return array<string, array{0: mixed}>
     */
    public static function invalidStockValues(): array
    {
        return [
            'negative' => [-1],
            'decimal' => [2.5],
            'text' => ['banyak'],
        ];
    }

    #[DataProvider('invalidStockValues')]
    public function test_stock_must_be_a_non_negative_integer(mixed $stok): void
    {
        $response = $this->post(route('barang.store'), [
            'nama' => 'Kardus Karton 40x30',
            'kategori' => 'Kemasan',
            'satuan' => 'pcs',
            'lokasi_rak' => 'Rak A1',
            'stok' => $stok,
        ]);

        $response->assertSessionHasErrors('stok');

        $this->assertDatabaseCount('barangs', 0);
    }
}
