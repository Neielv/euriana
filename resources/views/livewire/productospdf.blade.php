<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <div style="float: right;">
            <img src= "./images/biormed_logo.jpg" width="200">
            </div>
      <h3>BIORMED</h3>
          <h3> LISTA DE PRODUCTOS</h3>  
          {{ now()}}        
    <hr/>
    
    
    <table style="border: 1px solid black;  border-collapse: collapse;">
        <tr style="border: 1px solid black;">   
            <td style="border: 1px solid black;"><strong> # </strong></td>         
            <td style="border: 1px solid black;"><strong> Código </strong></td>
                    
            <td style="border: 1px solid black;"><strong> Nombre </strong></td>
                  
            <td style="border: 1px solid black;"><strong> Decripción </strong></td>
                   
            <td style="border: 1px solid black;"><strong> Existencia </strong></td>
            <td style="border: 1px solid black;"><strong> Precio 1 </strong></td>
            <td style="border: 1px solid black;"><strong> Precio 2 </strong></td>
            <td style="border: 1px solid black;"><strong> Precio 3 </strong></td>
        </tr>
      
            <td style="border: 1px solid black;">{{$total}}</td>
                              
        
    </table>
 </body>
    
   
</html>