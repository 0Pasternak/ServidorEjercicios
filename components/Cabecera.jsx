import React from 'react'
import PropTypes from 'prop-types'
import "../style/main.css"
import { useNavigate } from 'react-router-dom';

function Cabecera(props) {
    const navigate = useNavigate();

  const Alta = (id) => {
    navigate('/Alta');
  };
  const Consulta = (id) => {
    navigate('/Consulta');
  };
  const Password = (id) => {
    navigate('/Password');
  };
  const Borrar = (id) => {
    navigate('/Borrar');
  };
  const Lista = (id) => {
    navigate('/Lista');
  };
  return (
    <div>
        <div className="menu">
            <button id="consultaBoton" onClick={() => Consulta()}>consulta</button>
            <button id="altaBoton" onClick={() => Alta()}>alta</button>
            <button id="passwordBoton" onClick={() => Password()}>password</button>
            <button id="borrarBoton" onClick={() => Borrar()}>Borrar</button>
            <button id="ListaBoton" onClick={() => Lista()}>Lista</button>
        </div>
        <div className="title">
            <h1>Gestiona tu carnet joven</h1>
        </div>
    </div>
  )
}

Cabecera.propTypes = {}

export default Cabecera
