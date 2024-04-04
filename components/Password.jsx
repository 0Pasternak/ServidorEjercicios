import React, { useState } from 'react';
import PropTypes from 'prop-types';
import "../style/main.css";
import Cabecera from './Cabecera';
import { ComprobarDatos2 } from '../datos/comprobacion2'; 
import axios from 'axios';

function Password(props) {

    const [nifRecuperar, setnifRecuperar] = useState('');
    const [consultaData, setConsultaData] = useState(null);

    const ConsultaDatos2 = (event) => {
        const { name, value } = event.target;
        switch (name) {
            case 'nifRecuperar':
                setnifRecuperar(value);
                break;
            default:
                break;
        }
    };


    const EnviarConsulta2 = async (event) => {
        event.preventDefault();
        try {
            const response = await ComprobarDatos2({ nifRecuperar });
            setConsultaData(response.data); 
            setnifRecuperar('');
        }catch(e){}
    };
  return (
    <div>
        <Cabecera></Cabecera>
        <div id="inicio">
            <p> ¿No recuerda su código de acceso? <br /> Introduza su Nif y haga click aquí </p>
        </div>
        <div class="cont">
            <form id="RecuperarClave" onSubmit={EnviarConsulta2}>
                <label for="nifRecuperar">numero de nif:</label><br />
                <input type="text" id="nifRecuperar" name="nifRecuperar" value={nifRecuperar}  onChange={ConsultaDatos2} required /><br />
                <input type="submit" value="recordar Clave" />
            </form>
        </div>
        <div id="respuesta">
                        {consultaData && consultaData.length > 0 && (
                            <p>Gracias, {consultaData[0].codigoacceso}</p>
                        )}
                        {console.log(consultaData)}
                    </div>
    </div>
  )
}

Password.propTypes = {}

export default Password
