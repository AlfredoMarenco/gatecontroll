<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Code>
 */
class CodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'barcode' => $this->faker->ean13(),
            'client_name' => $this->faker->name(),
            'section' => $this->faker->randomElement(['P4 | 19A BAJ','P9 | 29B BAJ','P13 | 41A BAJ','P10 | 32B BAJ','P4 | 18B BAJ','P7 | 27A BAJ','P7 | 28B BAJ','P10 | 33A BAJ','P14 | 4A BAJ','P6 | 25A BAJ','P11 | 38A BAJ','P13 | 41B BAJ','P10 | 32A BAJ','P7 | 26A BAJ','P13 | 40C BAJ','P4 | 19A BAJ','P4 | 18A BAJ','P5 | 23B BAJ','P4 | 19C BAJ','P1 | S6 P3','P4 | 17A BAJ','P3 | 15C BAJ','P4 | 20C BAJ','P10 | 33B BAJ','P1 | S6 P4','P10 | 34B BAJ','P1 | S7 P6','P4 | 19B BAJ','P13 | 40B BAJ','P4 | 20A BAJ','P10 | 34A BAJ','P5 | 22A BAJ','P1 | S6 P5','P6 | 24B BAJ','P13 | 2A BAJ','P4 | 17B BAJ','P5 | 21B BAJ','P3 | 14C BAJ','P2 | 11A BAJ','P1 | S10 P24','P1 | S10 P20','P1 | S6 P1','P7 | 26B BAJ','P9 | 31A BAJ','P5 | 21C BAJ','P14 | 3A BAJ','P5 | 23A BAJ','P13 | 1A BAJ','P5 | 21A BAJ','P1 | S10 P23','P5 | 22B BAJ','P14 | 4B BAJ','P9 | 30A BAJ','P7 | 27B BAJ','P6 | 24A BAJ','P11 | 36B BAJ','P11 | 36C BAJ','P9 | 30B BAJ','P2 | 12A BAJ','P3 | 13B BAJ','P2 | 11B BAJ','P11 | 35A BAJ','P9 | 31B BAJ','P9 | 29A BAJ','P14 | 3C BAJ','P3 | 15B BAJ','P2 | 12B BAJ','P3 | 13A BAJ','P11 | 35B BAJ','P14 | 5A BAJ','P3 | 15A BAJ','P11 | 36A BAJ','P13 | 2C BAJ','P14 | 3B BAJ','P13 | 1B BAJ','P1 | 7','P14 | 5B BAJ','P1 | S8 P13','P13 | 2B BAJ','P1 | S9 P16','P11 | 37B BAJ','P4 | 16C BAJ','P6 | 25B BAJ','P1 | S7 P8','P1 | S9 P17','P13 | 41C BAJ','P11 | 37C BAJ','P1 | S8 P12','P3 | 14A BAJ','P1 | S8 P11','P1 | S9 P19','P4 | 20B BAJ','P4 | 16B BAJ','P4 | 16A BAJ','P1 | S9 P18','P11 | 38B BAJ','P13 | 40A BAJ','P4 | 18C BAJ','Palcos','P11 | 37A BAJ','P1 | S7 P9','P11 | 38C BAJ','P7 | 28A BAJ','P3 | 13C BAJ','P3 | 14B BAJ','P12 | 39A BAJ','E19 | 7A ALT','E19 | 7B ALT','E19 | 8A ALT','E3 | 16B ALT','E4 | 17A ALT','E4 | 17B ALT','E6 | 23B ALT','E6 | 24A ALT','E6 | 24B ALT','E7 | 29B ALT','E9 | 30A ALT','E9 | 30B ALT','E11 | 37B ALT','E13 | 38A ALT','E13 | 38B ALT','E16 | 46B ALT','E16 | 47A ALT','E16 | 47B ALT','P4 | 17C BAJ','P1 | S8 P14','P13 | 1C BAJ','P1 | S10 P22','P1 | S8 P10','P1 | 9','P1 | 6','P1 | S8 P15','P12 | 39B BAJ','P12 | 39C BAJ','E19 | 8B ALT','E19 | 9A ALT','E1 | 10A ALT','E4 | 18A ALT','E4 | 18B ALT','E9 | 31A ALT','E9 | 31B ALT','E13 | 39A ALT','E13 | 39B ALT','E16 | 48A ALT','E16 | 48B ALT','P1 | S7 P7','P1 | S10 P21','P1 | 10','E17 | 2A ALT','E17 | 2B ALT','E17 | 3A ALT','E1 | 11B ALT','E1 | 12A ALT','E1 | 12B ALT','E4 | 19B ALT','E4 | 20A ALT','E4 | 20B ALT','E6 | 25B ALT','E7 | 26A ALT','E7 | 26B ALT','E9 | 32B ALT','E11 | 33A ALT','E11 | 33B ALT','E13 | 40B ALT','E14 | 41A ALT','E14 | 41B ALT','E16 | 1B ALT','Ext1','E17 | 3B ALT','E17 | 4A ALT','E3 | 13A ALT','E3 | 13B ALT','E4 | 21A ALT','E6 | 22A ALT','E6 | 22B ALT','E7 | 27A ALT','E7 | 27B ALT','E11 | 34A ALT','E11 | 34B ALT','E14 | 42A ALT','E14 | 42B ALT','Ext2','CaP Dif','P1 | S6 P2','E17 | 4B ALT','E17 | 5A ALT','E3 | 14A ALT','E3 | 14B ALT','E6 | 23A ALT','E7 | 28A ALT','E7 | 28B ALT','E11 | 35A ALT','E11 | 35B ALT','E14 | 43A ALT','E14 | 43B ALT','E17 | 5B ALT','E19 | 6A ALT','E3 | 15A ALT','E3 | 15B ALT','E7 | 29A ALT','E11 | 36A ALT','E11 | 36B ALT','E13 | 37A ALT','E14 | 44A ALT','E14 | 44B ALT','E1 | 10B ALT','E1 | 11A ALT','E4 | 19A ALT','E6 | 25A ALT','E9 | 32A ALT','E11 | 40A ALT','E16 | 1A ALT','E19 | 6B ALT','E3 | 16A ALT','E14 | 45A ALT','E16 | 46A ALT']),
            'price_category' => $this->faker->randomElement(['A Cabecera Sur Familiar','Poniente Central Izzi','A Cabecera Norte','Lateral Poniente','Lateral Oriente','Vip Total Play','Dorada','Vip','Palcos']),
            'row' => $this->faker->randomLetter(),
            'seat' => $this->faker->numberBetween(1,150),
            'cost_ticket' => $this->faker->randomNumber(3,true),
            'order' => $this->faker->randomNumber(6,true),
            'price_type' => $this->faker->randomElement(['PRICE CATEGORY','PREVENTA','Mto_Cen_Pte_B','Cortesia','Pack_2','Mto_Lat_Pte_B','REG','Pack_1','ABON_4X3','CRED_EMP_ABONO','REG_ABONO','RENOV_ABONO','ASPERF_ABONO','CORT_ABONO','PAGUITOS_ABONO','Mto_Cab_Nte_B','Mto_Cab_Sur_B','Mto_Lat_Ote_B','Mto_Vip_B','PRO_CL24','Mem_Lat_Ote_C','Mem_Cab_Nte_C','Mem_Lat_Pte_C','CUPON_ABONO','REG1_ABONO']),
            'status_id' => Status::all()->random()->id,
            'event_id' => Event::all()->random()->id
        ];
    }
}
