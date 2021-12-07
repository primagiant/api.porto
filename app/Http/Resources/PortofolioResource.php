<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PortofolioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mahasiswa' => new MahasiswaResource($this->mahasiswa),
            'kategori_kegiatan' => $this->kategori_kegiatan->nama,
            'jenis_kegiatan' => $this->jenis_kegiatan->nama,
            'ref_point' => $this->jenis_kegiatan->ref_point,
            'valid_point' => $this->valid_point,
            'nama_kegiatan' => $this->nama_kegiatan,
            'penyelenggara' => $this->penyelenggara,
            'tahun' => $this->tahun,
            'bukti' => $this->bukti,
            'status' => $this->status,
        ];
    }
}