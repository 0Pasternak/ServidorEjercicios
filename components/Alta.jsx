import React, { useState } from 'react';
import { guardarDatos } from '../datos/datos';
import "../style/main.css"
import Cabecera from './Cabecera';

const Formulario = () => {
    const [nombre, setNombre] = useState('');
    const [nif, setNif] = useState('');
    const [clave, setClave] = useState('');
    const [anoNacimiento, setAnoNacimiento] = useState('');

    const handleInputChange = (event) => {
        const { name, value } = event.target;
        if(value != null){
            switch (name) {
                case 'nombre':
                    setNombre(value);
                    break;
                case 'nif':
                    setNif(value);
                    break;
                case 'clave':
                    setClave(value);
                    break;
                case 'anoNacimiento':
                    setAnoNacimiento(value);
                    break;
                default:
                    break;
            }

        }
        
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        
        if (nif.length === 9 || nif !== null || nombre !== null || clave !== null || anoNacimiento !== null) {
            try {
                await guardarDatos({ nombre, nif, clave, anoNacimiento });
                setNombre('');
                setNif('');
                setClave('');
                setAnoNacimiento('');
            } catch (error) {
                console.error(error);
                alert('Error al guardar los datos');
            }
        } else {
            console.log("Estás cometiendo errores en algún campo");
        }
        
    };

    return (
        <div>
            <Cabecera></Cabecera>
            <div id="sec3">
                <div id="inicio">
                    <p>Bienvenido a la página de gestión de tu carnet joven. <br />
                        Consulta de datos. <br />
                        Introduce los campos de información necesarios para gestionar tu carnet. <br />
                    </p>
                </div>

                <h2>Registro nuevo usuario</h2>
                <div id="inicio">
                    <p>Todos los campos son obligatorios</p>
                </div>

                <form id="registroForm" onSubmit={handleSubmit}>
                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre"
                        value={nombre}
                        onChange={handleInputChange}
                    /> <br />
                    <input
                        type="text"
                        name="nif"
                        placeholder="NIF"
                        value={nif}
                        onChange={handleInputChange}
                    /> <br />
                    <input
                        type="password"
                        name="clave"
                        placeholder="Clave"
                        value={clave}
                        onChange={handleInputChange}
                    /> <br />
                    <input
                        type="number"
                        name="anoNacimiento"
                        placeholder="Año de nacimiento"
                        value={anoNacimiento}
                        onChange={handleInputChange}
                    /> <br />
                    <button type="submit">Guardar</button>
                </form>
            </div>
        </div>

    );
};

export default Formulario;
