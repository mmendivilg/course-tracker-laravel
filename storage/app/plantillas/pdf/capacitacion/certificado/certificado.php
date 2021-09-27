<div class="logo logo-big" style="background-image: url('<?= $logo_big ?>');">
    &nbsp;
</div> 
<div class="logo logo-circle" style="background-image: url('<?= $logo_circle ?>');">
    &nbsp;
</div>   
<div class="logo logo-eye" style="background-image: url('<?= $logo_eye ?>');">
    &nbsp;
</div>
<div class="logo firma" style="background-image: url('<?= $data['capacitador']['firma'] ?>');">
    &nbsp;
</div>

<div class="title1">
    <h3>consultoria en desarrollo de software</h3>
</div>
<div class="title2">
    <h6>otorga la presente</h6>
</div>
<div class="title3">
    <h2><?= implode( '&nbsp;&nbsp;&nbsp;', str_split( 'CONSTANCIA' ) ) ?></h2>
</div>
<div class="title4">
    <span class="h7">A</span>
</div>
<div class="title5">
    <h1><?= $data['trabajador']['nombre'] ?></h1>
</div>
<div class="title6">
    <div style="width: 50%;" class="centered">
        <h5>Por su participación en el curso</h5>
    </div>
</div>
<div class="title7">
    <div style="width: 80%;" class="centered">
        <h4><?= $data['curso']['nombre'] ?></h4>
    </div>
</div>
<div class="title8">
    <h5>Llevado a cabo en las instalaciones de <?=$data['empresa']['nombre'] ?>, <?=$data['empresa']['calle'] ?>, <?= $data['empresa']['codigo_postal'] ?> <?= $data['empresa']['ciudad'] ?>, <?= $data['empresa']['estado'] ?>, <?= $data['empresa']['pais'] ?>
        <br/>
        El día <?= $data['curso']['fecha_completa'] ?>
        <br/>
        Con una duración de <?= $data['curso']['duracion'] ?> horas
    </h5>
</div>
<div class="title9">
    <h5>Capacitador</h5>
</div>
<div class="title10">
    <div class="centered underlined" style="width: 60%; height: 10px;">
        &nbsp;
    </div>
    <div style="width: 100%; padding-top:5px;">
        <span class="h8">
            <?= $data['capacitador']['nombre_agente'] ?>
            <br/>
            <?= $data['capacitador']['registro_stps'] ?>
        </span>
    </div>
</div>