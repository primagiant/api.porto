<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MahasiswaResource extends JsonResource
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
            'nim' => $this->nim,
            'user_id' => $this->user_id,
            'nama' => $this->nama,
            'pembimbing_akademik' => $this->pembimbing_akademik->nama,
            'angkatan' => $this->angkatan->tahun,
            'fakultas' => $this->fakultas->nama_fakultas,
            'jurusan' => $this->jurusan->nama_jurusan,
            'prodi' => $this->prodi->nama_prodi,
            'status' => $this->status,
        ];
    }
}
