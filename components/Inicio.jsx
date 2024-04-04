import React from 'react'
import PropTypes from 'prop-types'
import "../style/main.css"
import { useNavigate } from 'react-router-dom';
import Cabecera from './Cabecera';

function Inicio(props) {
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
  return (
    <div>
      <Cabecera></Cabecera>

      <div id="sec1">
        <div className="cont">
          <div id="inicio">
            <p>Bienvenido a la página de gestión de tu carnet joven. <br />
              Consulta de datos. <br />
                Introduce los campos de información necesarios para gestionar tu carnet.
              </p>
            </div>
          </div>
        </div>

        <div id="img">
          <div className="">
            <img src="img/tarjeta-cjmadrid.png" alt="" className="tarjeta" />
          </div>
        </div>

        <div id="sec2">
          <div className="cont">
            <div id="inicio">
              <p>Bienvenido a la página de gestión de tu <br /> joven- <br /> Consulta de datos- <br /> Introduce los carnpos de inforrnación <br /> necesarios para gestionar tu carnet. </p>
            </div>
        </div>
      </div>
    </div>
  )
}

Inicio.propTypes = { }

export default Inicio
