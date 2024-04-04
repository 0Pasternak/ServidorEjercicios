import React, { useState, useEffect } from 'react';
import PropTypes from 'prop-types';
import "../style/main.css";
import Cabecera from './Cabecera';
import { ListaDatos } from '../datos/lictaC'; 
import axios from 'axios';

function Lista(props) {
    const [consultaData, setConsultaData] = useState([]);

    useEffect(() => {
        EnviarConsulta();
    }, []);

    const EnviarConsulta = async () => {
        try {
            const listaUsuarios = await ListaDatos();
            setConsultaData(listaUsuarios); 
        } catch(error) {
            
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
                    <div id="respuesta">
                        <table>
                            <thead>
                                <tr>
                                <th>nif</th>
                                    <th>Nombre</th>
                                    <th>nacimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                {consultaData && consultaData.map((usuario, index) => (
                                    <tr key={index}>
                                        <td>{usuario.nif}</td>
                                        <td>{usuario.nombreapellidos}</td>
                                        <td>{usuario.annonacimiento}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    );
}

Lista.propTypes = {}

export default Lista;
