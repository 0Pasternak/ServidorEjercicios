import React, { useState } from 'react';
import PropTypes from 'prop-types';
import "../style/main.css";
import Cabecera from './Cabecera';
import { ComprobarDatos } from '../datos/comprobacion'; 
import axios from 'axios';

function Consulta(props) {
    const [nif, setNif] = useState('');
    const [codigo, setCodigo] = useState('');
    const [consultaData, setConsultaData] = useState(null);

    const ConsultaDatos = (event) => {
        const { name, value } = event.target;
        switch (name) {
            case 'nif':
                if(value != null ){
                    setNif(value);
                }
                
                break;
            case 'codigo':
                if(value != null ){
                    setCodigo(value);
                }
                break;
            default:
                break;
        }
    };


    const EnviarConsulta = async (event) => {
        event.preventDefault();
        if(nif.length == 9){
            try {
                const response = await ComprobarDatos({ nif, codigo });
                setConsultaData(response.data); 
                setNif('');
                setCodigo('');
            }catch(e){}

        }else{
            console.log("no cumple con la validacion")
        }
        
    };



    return (
        <div>
            <Cabecera />
            <div id="sec2">
                <div className="cont">
                    <div id="inicio">
                        <p>Bienvenido a la página de gestión de tu <br />
                            joven- <br />
                            Consulta de datos- <br />
                            Introduce los campos de información <br />
                            necesarios para gestionar tu carnet.
                        </p>
                    </div>
                </div>
                <div className="cont">
                    <form id="loginForm" onSubmit={EnviarConsulta}>
                        <label htmlFor="nif">Numero de nif:</label><br />
                        <input 
                            type="text" 
                            id="nif" 
                            name="nif" 
                            required 
                            value={nif}
                            onChange={ConsultaDatos}
                        /><br />

                        <label htmlFor="codigo">Codigo de acceso:</label><br />
                        <input 
                            type="text" 
                            id="codigo" 
                            name="codigo" 
                            required  
                            value={codigo}
                            onChange={ConsultaDatos}
                        /><br /><br />
                        <input type="submit" value="Consultar" />
                    </form>
                </div>
                <div className="cont">
                    <div id="respuesta">
                        {consultaData && consultaData.length > 0 && (
                            <p>Gracias, {consultaData[0].nombreapellidos}</p>
                        )}
                    </div>
                </div>

            </div>
        </div>
    );
}

Consulta.propTypes = {};

export default Consulta;
