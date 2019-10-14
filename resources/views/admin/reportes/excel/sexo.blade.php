<?php
use Carbon\Carbon;

function concatenar($numero)
{
    $n=strlen($numero);
    if ($n==1) {
        $a='0000'.$numero;
    }
    else if ($n==2) {
        $a='000'.$numero;
    }
    else if ($n==3) {
        $a='00'.$numero;
    }
    else if ($n==4) {
        $a='0'.$numero;
    }
    else{
        $a=$numero;
    }
    return $a;
}
?>
<table border="1">
    <thead>
        <tr>
            <td colspan="8" align="center">REPORTE DE INSCRITOS ENTRE {{ $desde }} y {{ $hasta }}</td>
        </tr>
        <tr>
            <td colspan="8" align="center">SEXO: {{ $sexo }}</td>
        </tr>
        <tr>
            <th>#</th>
            <th>Inscripción</th>
            <th>Ficha de evaluación</th>
            <th>Nombres y apellidos</th>
            <th>Sexo</th>
            <th>Celular</th>
            <th>E-mail</th>
            <th>Sector</th>
        </tr>
    </thead>
    <tbody>
        @php
            $num = 1;
        @endphp
        @foreach($inscritos as $inscrito)
        <tr>
            <td>{{ $num }}</td>
            @php
                $num = $num+1;
            @endphp
            <td>
                {{ Carbon::parse($inscrito->created_at)->format('d/m/Y h:i a') }}
            </td>
            <td>
                @foreach ($inscrito->fichas as $ficha)
                Nro. {{ concatenar($ficha->correlativo) }}
                @endforeach
            </td>
            <td>{{ $inscrito->nombres }} {{ $inscrito->apellidos }}</td>
            <td>
                @if ($inscrito->sexo == 1)
                    Hombre
                @else
                    Mujer
                @endif
            </td>
            <td>{{ $inscrito->telefono }}</td>
            <td>{{ $inscrito->email }}</td>
            <td>{{ $inscrito->sector->sector }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
