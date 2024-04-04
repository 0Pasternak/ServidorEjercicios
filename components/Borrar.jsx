import React, { useState } from 'react';
import PropTypes from 'prop-types';
import "../style/main.css";
import Cabecera from './Cabecera';
import { BorrarDatos } from '../datos/borrar'; 
import axios from 'axios';

function Borrar(props) {
    const [nif, setNif] = useState('');
    const [codigo, setCodigo] = useState('');


    const ConsultaDatos = (event) => {
        const { name, value } = event.target;
        switch (name) {
            case 'nif':
                setNif(value);
                break;
            case 'codigo':
                setCodigo(value);
                break;
            default:
                break;
        }
    };


    const EnviarConsulta = async (event) => {
        event.preventDefault();
        try {
            const response = await BorrarDatos({ nif, codigo });
            
            setNif('');
            setCodigo('');
        }catch(e){}
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
                        <input type="submit" value="Borrar" />
                    </form>
                </div>
                

            </div>
        </div>
  )
}

Borrar.propTypes = {}

export default Borrar
