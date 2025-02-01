<?php

namespace App\Exports;

use App\Models\PruebaInscripta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InscripcionesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * Obtiene los datos con las relaciones
    */
    public function collection()
    {
        return PruebaInscripta::with(['user', 'perroModel'])->get();
    }

    /**
    * Define los encabezados de las columnas en el archivo Excel
    */
    public function headings(): array
    {
        return [
            'Usuario Registrado', 'Identificación', 'Email', 'Teléfono', 'País', 'Región',
            'Prueba y Disciplina', 'Fecha de Prueba', 'Valor', 'Pago', 'Fecha Inscripción',
            'Nombre del Perro', 'Raza', 'Sexo', 'Fecha de Nacimiento', 'Libro Orígenes',
            'N° Chip', 'N° Cartilla', 'Conductor', 'Propietario', 'Pais'
        ];
    }

    /**
    * Mapea los datos de cada fila en el Excel
    */
    public function map($inscripcion): array
    {
        return [
            $inscripcion->user->name ?? 'N/A',
            $inscripcion->user->identificacion ?? 'N/A',
            $inscripcion->user->email ?? 'N/A',
            $inscripcion->user->telefono ?? 'N/A',
            $inscripcion->user->pais ?? 'N/A',
            $inscripcion->user->region ?? 'N/A',

            trim($inscripcion->prueba),
            $inscripcion->fecha,
            $inscripcion->valor,
            $inscripcion->pago == 1 ? 'SÍ' : 'NO',
            $inscripcion->created_at->format('Y-m-d H:i:s'),

            $inscripcion->perroModel->nombre_perro ?? 'N/A',
            $inscripcion->perroModel->raza ?? 'N/A',
            $inscripcion->perroModel->sexo ?? 'N/A',
            $inscripcion->perroModel->fecha_nacimiento ?? 'N/A',
            $inscripcion->perroModel->libro_de_origenes ?? 'N/A',
            (string) $inscripcion->perroModel->microchip ?? 'N/A',
            (string) $inscripcion->perroModel->cartilla_de_trabajo ?? 'N/A',
            $inscripcion->perroModel->conductor ?? 'N/A',
            $inscripcion->perroModel->propietario ?? 'N/A',
            $inscripcion->perroModel->pais ?? 'N/A',
        ];
    }
}
