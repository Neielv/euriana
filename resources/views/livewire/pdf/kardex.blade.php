<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <div style="float: left;">
            <img src= "./images/logo_cnig.jpg" width="200">
            </div>
     <center>
         
          <h4>CONSEJO NACIONAL PARA PARA LA IGUALDAD DE GENERO
          UNIDAD DE TALENTO HUMANO
          KARDEX DE PERMISOS - COMISIONES - VACACIONES</h4> 
          
     </center> 
     
     
     <table style=" border-collapse: collapse;">
        <tr height="10">   
            <td height="10"><strong> Cédula del funcionario: </strong></td>         
            
            <td height="10" >{{$cedula}}</td>
        </tr>
        <tr height="10">   
            <td height="10" ><strong> Nombre del servidor/a: </strong></td>         
            
            <td >{{$nombre}}</td>
        </tr>
        <tr height="10">   
            <td ><strong> Unidad del funcionario: </strong></td>         
            
            <td >{{$unidad}}</td>
        </tr>        
        <tr height="10">   
            <td height="10"><strong> Fecha de ingreso :</strong>         
            
            <td > {{$fecha_ingreso}}</td>  
        </tr>
         
     
    </table>
    <hr/>
    
 
   
   <table style="border: 0px solid black;  border-collapse: collapse;">
    <tr style="border: 0px solid black;">            
        <td style="border: 1px solid black;     "><strong> # </strong></td>
                
        <td style="border: 1px solid black;"><strong> FECHA </strong></td>

        <td style="border: 1px solid black;"><strong> TIPO DE PERMISO </strong></td>

        <td style="border: 1px solid black;"><strong> DEBE (H:M:S) </strong></td>

        <td style="border: 1px solid black;"><strong> HABER (H:M:S) </strong></td>

        <td style="border: 1px solid black;"><strong> SALDO (H:M:S) </strong></td>

        <td style="border: 0px solid black;"><strong>  </strong></td>
        <td style="border: 1px solid black;"><strong>  PELANIDAD </strong></td>
        <td style="border: 1px solid black;"><strong>  SALDO </strong></td>
    </tr>
    <tr>
        <td style="border: 1px solid black;  font-size: 10px;"> 1 </td>
        <td style="border: 1px solid black;  font-size: 10px;"> 01-01-2023 </td>
        <td style="border: 1px solid black;  font-size: 10px;"> Saldo inicial </td>
        <td style="border: 1px solid black;  font-size: 10px;"> {{$saldo_inicial}} </td>
        <td style="border: 1px solid black;  font-size: 10px;">  </td>
        <td style="border: 1px solid black;  font-size: 10px;"> {{$saldo_inicial}} </td>
        <td style="border: 0px solid black;  font-size: 10px;">  </td>
        <td style="border: 1px solid black;  font-size: 10px;"> </td>
        <td style="border: 1px solid black;  font-size: 10px;"> {{$saldo_inicial}} </td>
    </tr> 
    @foreach ($datos_kardex as $kardex)
    <tr>
        <td style="border: 1px solid black; font-size: 10px;" > {{$loop->iteration+1}} </td>
        <td style="border: 1px solid black; font-size: 10px;"> {{$kardex['Fecha']}} </td>
        <td style="border: 1px solid black; font-size: 10px;"> {{$kardex['Tipo']}} </td>
        <td style="border: 1px solid black; font-size: 10px;"> {{$kardex['Debe']}} </td>
        <td style="border: 1px solid black; font-size: 10px;"> {{$kardex['Haber']}} </td>
        <td style="border: 1px solid black; font-size: 10px;"> {{$kardex['Saldo']}} </td>
        <td style="border: 0px solid black; font-size: 10px;">  </td>
        <td style="border: 1px solid black; font-size: 10px;"> {{$kardex['Penalidad']}} </td>
        <td style="border: 1px solid black; font-size: 10px;"> {{$kardex['SaldoPenal']}} </td>
    </tr>   
@endforeach
</table>
    
 </body>
    
   
</html>