<?php

namespace App\View\Components;

use Illuminate\View\Component;

class KopSurat extends Component
{
    private $logo;
    private $perusahaan;
    private $alamat;
    private $kontak;
    private $website;

    public function __construct($logo,$perusahaan,$alamat,$kontak,$website)
    {
        $this->logo = $logo;
        $this->perusahaan = $perusahaan;
        $this->alamat = $alamat;
        $this->kontak = $kontak;
        $this->website = $website;
    }


    public function render()
    {
        return view('components.kop-surat',[
            'logo' => $this->logo,
            'perusahaan' => $this->perusahaan,
            'alamat' => $this->alamat,
            'kontak' => $this->kontak,
            'website' => $this->website
        ]);
    }
}
