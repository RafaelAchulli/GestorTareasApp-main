<?php
require_once '../vendor/autoload.php';

class PDFGenerator {
    public static function generar($tasks) {
        $mpdf = new \Mpdf\Mpdf();
        $html = '<h1>Reporte de Tareas</h1><ul>';

        foreach ($tasks as $task) {
            $descripcion = !empty($task['descripcion']) ? $task['descripcion'] : "No hay Descripción";
            $html .= "<li>{$task['nombre']} - {$descripcion} - {$task['estado']}</li>";
        }

        $html .= '</ul>';
        $mpdf->WriteHTML($html);
        $mpdf->Output('reporte.pdf', 'D');
    }
}