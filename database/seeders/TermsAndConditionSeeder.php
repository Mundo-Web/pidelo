<?php

namespace Database\Seeders;

use App\Models\TermsAndCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermsAndConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TermsAndCondition::create([
            'content' => '<h2>Pol&iacute;ticas de Devoluci&oacute;n</h2>
            <p>Nuestra prioridad es asegurar que est&eacute;s completamente satisfecho con tu compra. Si por alguna raz&oacute;n no est&aacute;s conforme con el producto recibido, ofrecemos las siguientes pol&iacute;ticas de devoluci&oacute;n:</p>
            <p><strong>1. Plazo de Devoluci&oacute;n:</strong> Tienes un plazo de 30 d&iacute;as a partir de la fecha de recepci&oacute;n del producto para realizar una devoluci&oacute;n.</p>
            <p><strong>2. Condiciones del Producto:</strong> El art&iacute;culo debe estar en su estado original, sin usar y con todas las etiquetas y empaques originales intactos.</p>
            <p><strong>3. Proceso de Devoluci&oacute;n:</strong> Para iniciar una devoluci&oacute;n, cont&aacute;ctanos a trav&eacute;s de nuestro formulario de contacto o al correo electr&oacute;nico <strong>devoluciones@tuempresa.com</strong>. Proporci&oacute;nanos tu n&uacute;mero de pedido y los detalles del producto que deseas devolver.</p>
            <p><strong>4. Gastos de Env&iacute;o:</strong> Los gastos de env&iacute;o para la devoluci&oacute;n correr&aacute;n por cuenta del cliente, a menos que la devoluci&oacute;n sea debido a un error nuestro o a un producto defectuoso.</p>
            <p><strong>5. Reembolso:</strong> Una vez recibida y revisada la devoluci&oacute;n, te notificaremos sobre la aprobaci&oacute;n o rechazo de tu reembolso. Si se aprueba, se procesar&aacute; un reembolso autom&aacute;ticamente a tu m&eacute;todo original de pago dentro de un plazo de 10 d&iacute;as h&aacute;biles.</p>
            <p><strong>6. Reembolso:</strong> Una vez recibida y revisada la devoluci&oacute;n, te notificaremos sobre la aprobaci&oacute;n o rechazo de tu reembolso. Si se aprueba, se procesar&aacute; un reembolso autom&aacute;ticamente a tu m&eacute;todo original de pago dentro de un plazo de 10 d&iacute;as h&aacute;biles.</p>
            <p><strong>7. Reembolso:</strong> Una vez recibida y revisada la devoluci&oacute;n, te notificaremos sobre la aprobaci&oacute;n o rechazo de tu reembolso. Si se aprueba, se procesar&aacute; un reembolso autom&aacute;ticamente a tu m&eacute;todo original de pago dentro de un plazo de 10 d&iacute;as h&aacute;biles.</p>
            <p>Gracias por tu confianza en nuestros productos y servicios. Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en <strong>contactarnos</strong>.</p>'
        ]);
    }
}
