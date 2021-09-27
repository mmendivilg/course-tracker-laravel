<div class="topheader">
    <p>La falta de información en los datos opcionales, no será motivo para negar la presentación respectiva</p>
</div>
<div class="toptitle">
    <p>CONSTANCIA DE HABILIDADES LABORALES</p>
    <p>Formato DC-3</p>
</div>
<div class="section">
    <div class="section-title">DATOS DEL TRABAJADOR</div>
    <div class="sub-section-legend">
        <span class="legend legend1">Nombre (Anotar apellido paterno, apellido materno y nombre)</span>
    </div>
    <div class="sub-section-field">
        <span class="legend legend2 bold"><?= $data['trabajador']['nombre'] ?></span>
    </div>
    <div class="sub-section-box">
        <div class="sub-section">
            <div class="sub-section-legend">
                <span class="legend legend1">Registro Federal de Contribuyentes (SHCP)</span>
            </div>
            <table class="letters-sub-section">
                <tr>
                    <td class="bold" style="width: 55px;"></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border">-</td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border">-</td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['trabajador']['rfc'] ) ?></td>
                </tr>
            </table>
        </div>
        <div class="sub-section-legend">
            <span class="legend legend1">Puesto</span>
        </div>
        <div class="sub-section-field">
            <span class="legend legend2 bold"><?= $data['trabajador']['puesto'] ?: '&nbsp;' ?></span>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">DATOS DE LA EMPRESA</div>
    <div class="sub-section-legend">
        <span class="legend legend1">Nombre o razón social (En caso de persona física, anotar apellido paterno, apellido materno y nombre)</span>
    </div>
    <div class="sub-section-field">
        <span class="legend legend2 bold"><?= $data['empresa']['nombre'] ?></span>
    </div>
    <div class="sub-section-box">
        <div class="sub-section">
            <div class="sub-section-legend">
                <span class="legend legend1">Registro Federal de Contribuyentes (SHCP)</span>
            </div>
            <table class="letters-sub-section">
                <tr>
                    <td class="bold" style="width: 55px;"></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border">-</td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border">-</td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['rfc'] ) ?></td>
                </tr>
            </table>
        </div>
        <div class="sub-section-legend">
            <span class="legend legend1">Registro patronal del I.M.S.S.</span>
        </div>
        <div class="letters-sub-section-right">
            <table class="letters-sub-section">
                <tr>
                    <td class="bold" style="width: 48px;"></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                    <td class="bold letter-border">-</td>
                    <td class="bold letter-border"><?= array_shift( $data['empresa']['imss'] ) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="sub-section-box">
        <div class="sub-section-legend">
            <span class="legend legend1">Actividad giro principal</span>
        </div>
        <div class="sub-section-field">
            <span class="legend legend2 bold"><?= $data['empresa']['giro'] ?: '&nbsp;' ?></span>
        </div>
    </div>
</div>

<div class="section">
    <div class="section-title">DATOS DEL PROGRAMA DE CAPACITACIÓN Y ADIESTRAMIENTO</div>
    <div class="sub-section-legend">
        <span class="legend legend1">Nombre del programa o curso</span>
    </div>
    <div class="sub-section-field">
        <span class="legend legend2 bold"><?= $data['curso']['nombre'] ?></span>
    </div>
    <div class="sub-section-box">
        <div class="sub-section-duration">
            <div class="sub-section-legend">
                <span class="legend legend1">Duración en horas</span>
            </div>
            <div class="sub-section-field">
                <span class="legend legend2 bold"><?= $data['curso']['duracion'] ?: '&nbsp;' ?></span>
            </div>
        </div>
        <div class="letters-sub-section-right">
            <table class="letters-sub-section">
                <tr>
                    <th class="legend legend1" style="width: 130px;">Periodo de ejecución</th>
                    <th class="legend legend1" style="width: 18px;"></th>
                    <th class="legend legend1" style="width: 68px;"></th>
                    <th class="legend legend1" colspan="2">Año</th>
                    <th class="legend legend1" colspan="2">Mes</th>
                    <th class="legend legend1" colspan="2">Día</th>
                    <th class="legend legend1" colspan="2"></th>
                    <th class="legend legend1" colspan="2">Año</th>
                    <th class="legend legend1" colspan="2">Mes</th>
                    <th class="legend legend1" colspan="2">Día</th>
                </tr>
                <tr>
                    <td style="width: 130px;"></td>
                    <td class="legend legend1" style="width: 18px;"></td>
                    <td class="legend legend1" style="width: 68px;">De</td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['a'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['a'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['a'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['a'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['a'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['a'] ) ?></td>
                    <td class="letter-border legend legend1" colspan="2">a</td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['b'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['b'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['b'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['b'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['b'] ) ?></td>
                    <td class="letter-border bold"><?= array_shift( $data['curso']['fechas']['b'] ) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="sub-section-box">
        <div class="sub-section-legend">
            <span class="legend legend1">Nombre del agente capacitador</span>
        </div>
        <div class="sub-section-field">
            <span class="legend legend2 bold"><?= $data['capacitadores']['nombres_agentes'] ?: '&nbsp;' ?></span>
        </div>
    </div>
    <div class="sub-section-box">
        <div class="sub-section-legend">
            <span class="legend legend1">Nombre y firma del instructor</span>
        </div>
        <div class="sub-section-field">
            <span class="legend legend2 bold"><?= $data['capacitadores']['nombres'] ?: '&nbsp;' ?></span>
        </div>
    </div>
</div>
<div class="section">
    <div class="section-title-white bold">Los datos se asientan en esta constancia bajo protesta de decir la verdad, apercibidos de la responsabilidad en que incurre todo
aquel que no se conduce con la verdad.</div>
<div class="margin-top-box">
        <div class="section-side">
            <div class="legend legend1">
                Representante de los trabajadores ante la comisión mixta de capacitación
            </div>
        </div>
        <div class="section-middle">&nbsp;</div>
        <div class="section-side">
            <div class="legend legend1">
                Representante de la empresa ante la comisión mixta de capacitación
            </div>
        </div>
    </div>
    <div class="margin-top-box-b">
        <div class="section-side-b signature-line">
            <div class="legend legend1 signature" style="padding-left: -34px;">
                Nombre y firma
            </div>
        </div>
        <div class="section-middle-b">&nbsp;</div>
        <div class="section-right signature-line">
            <div class="legend legend1">
            Nombre y firma
            </div>
        </div>
    </div>
</div>
<div class="legend legend2 bold">NOTAS</div>
<div class="legend-box-top legend legend1">
    <p>- Llenar a máquina o con letra de molde.</p>
    <p>- Deberá entregarse al trabajador dentro de los veinte días hábiles siguientes al término del curso de capacitación.</p>
    <p>- La empresa o patrón deberá conservar copia de las constancias relacionadas en la última lista de constancias presentada ante la autoridad laboral.</p>
</div>
<div class="legend-box-bottom legend legend0">
    <p>Para cualquier aclaración, duda y/o comentario con respecto al trámite, sírvase llamar al Sistema de Atención Telefónica a la Ciudadanía (SACTEL) a los
Teléfonos 54-80-20-00 en el D.F. y área metropolitana; del interior de la República sin costo para el usuario al 01-800-00114800, o al 18888-594-3372 desde
los Estados Unidos y Canadá.</p>
    <p>Consultas sobre el trámite llamar a la Dirección General de Capacitación al Teléfono 3000-3500 extensión 3526.</p>
    <p>Para quejas comunicarse al número telefónico del Órgano Interno de Control en la STPS al (55) 56-44-74-15.</p>
</div>