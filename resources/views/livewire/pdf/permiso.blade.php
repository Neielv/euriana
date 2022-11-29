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
          FORMULARIO DE SOLICITUD DE PERMISOS - COMISIONES - VACACIONES</h4> 
          
     </center>     
    <hr/>
    
    
    <table style=" border-collapse: collapse;">
        <tr height="30">   
            <td height="30"><strong> Cédula del funcionario: </strong></td>         
            
            <td height="30" >{{$cedula}}</td>
        </tr>
        <tr height="30">   
            <td height="30" ><strong> Nombre del servidor/a: </strong></td>         
            
            <td >{{$nombre}}</td>
        </tr>
        <tr height="30">   
            <td ><strong> Unidad del funcionario: </strong></td>         
            
            <td >{{$unidad}}</td>
        </tr>
        <tr height="30">   
            <td height="30"><strong> Tipo de permiso: </strong></td>         
            
            <td >{{$tipo}}</td>
        </tr>
        <tr height="30">   
            <td height="30"><strong> Fecha desde :</strong>{{$fecha_desde}}</td>         
            
            <td ><strong> Fecha hasta :</strong>{{$fecha_hasta}}</td>  
        </tr>
        <tr height="30">   
            <td height="30"><strong> Hora desde :</strong>{{$hora_desde}}</td>         
            
            <td ><strong> Hora hasta :</strong>{{$hora_hasta}}</td>  
        </tr>
        <tr height="30">   
            <td height="30"><strong> Motivo</td>         
            
            <td >{{$motivo}}</td>  
        </tr>
                
    </table>
    <center><h2>APROBACIÓN</h2></center>    
    <table style="margin-top: 100px">
        <tr height="30">
            <td height="30" style="align-content: center; border-top: 1px solid #000">
                <div style="width: 200px">
                   (F) {{$nombre}}
                </div>                
            </td>
            <td height="30" style="align-content: center; border-top: 1px solid #000 ">
                <div style="width: 200px">
                   {{$superior}}
                </div>                
            </td>
            <td height="30" style="align-content: center; border-top: 1px solid #000">
                <div style="width: 200px">
                   (F) UTH
                </div>                
            </td>
        </tr>
    </table>
 </body>
    
   
</html>