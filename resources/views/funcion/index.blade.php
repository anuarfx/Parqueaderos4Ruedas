@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div id="alertas">

                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-group">
                    <label for="">Insertar Arreglo</label>
                    <textarea name="" id="insert" cols="10" rows="5" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-group">
                    <label for="">Objeto Generado</label>
                    <textarea name="" id="generate" cols="10" rows="5" class="form-control" disabled></textarea>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="form-group">
                    <button class="btn btn-success" id="generar_objeto">Generar Objeto</button>
                    <button class="btn btn-warning" id="reset">Reiniciar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
   <script>
       function Alert(msg) {
           let alert = `
           <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>${msg}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
           `;
           $("#alertas").append(alert);
           setTimeout(()=>{
            $("#alertas >").remove();
           },4000)
       }
       $(document).ready(()=>{
            
            $("#reset").click(()=>{
                $("#insert").val("");
                $("#generate").val("");
            })

            $("#generar_objeto").click(()=>{
                var arreglo = $("#insert").val();
                try {
                    array = JSON.parse(arreglo);
                    //console.log(array);
                    var objetoGeneradoTemp = [];
                    for (let i = 0; i < array.length; i++) {
                        var am = 0 , pm = 0;
                        var objTemp = objetoGeneradoTemp.find(arr => arr.fecha == array[i][0]);
                        if (objTemp == undefined) {
                            if(array[i][1] == "AM") am +=  array[i][3];
                            if(array[i][1] == "PM") pm +=  array[i][3];
                            objetoGeneradoTemp.push({fecha:array[i][0],"AM":am,"PM":pm});
                        }else{
                            am = objTemp.AM;
                            pm = objTemp.PM;
                            if(array[i][1] == "AM") am +=  (array[i][3]);
                            if(array[i][1] == "PM") pm +=  (array[i][3]);
                            for (let j = 0; j < objetoGeneradoTemp.length; j++) {
                                if (array[i][0] == objTemp.fecha) {
                                    objetoGeneradoTemp[j].AM = am; 
                                    objetoGeneradoTemp[j].PM = pm; 
                                }                                
                            }
                        }
                    }
                    var objetoGeneradoString = "{";
                    var objetoGenerado = [];
                    var item = ""
                    for (let i = 0; i < objetoGeneradoTemp.length; i++) {
                        var json = {};
                        ;
                        if (objetoGeneradoTemp[i].AM == 0) json = {PM : objetoGeneradoTemp[i].PM};
                        if (objetoGeneradoTemp[i].PM == 0) json = {AM : objetoGeneradoTemp[i].AM};
                        if (objetoGeneradoTemp[i].PM != 0 && objetoGeneradoTemp[i].AM != 0) json = {AM : objetoGeneradoTemp[i].AM, PM : objetoGeneradoTemp[i].PM};
                        if(i == 0){
                            item += `${objetoGeneradoTemp[i].fecha}: ${JSON.stringify(json)} `
                        }else{
                            item += `\n,${objetoGeneradoTemp[i].fecha}: ${JSON.stringify(json)}`
                        }
                       // esta variable con tiene el objeto generado para su uso 
                        objetoGenerado[objetoGeneradoTemp[i].fecha] = json;
                    }
                    // esta variable contiene el objeto generado en string
                    objetoGeneradoString = `{ \n ${item} \n }`;
                    
                    
                    $("#generate").val(objetoGeneradoString);
                } catch(e) {
                    alert(`Tiene un Error en el Arraglo que esta Insertanto Siga el Sigiente Ejemplo :
                       [
                        ["2018-12-01","AM","ID123", 5000], 
                        ["2018-12-01","AM","ID545", 7000], 
                        ["2018-12-01","PM","ID545", 3000], 
                        ["2018-12-02","AM","ID545", 7000]	
                        ]
                    
                    `); // error in the above string (in this case, yes)!
                }
                
            })
       })
   </script>    
@endsection