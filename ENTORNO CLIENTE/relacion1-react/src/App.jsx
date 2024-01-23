import { Ejercicio1 } from './Components/ejercicio1';
import { Ejercicio2 } from './Components/Ejercicio2';
import { Ejercicio3 } from './Components/Ejercicio3';
import { Ejercicio4 } from './Components/Ejercicio4';
import { CustomButton } from './components/CustomButton';
import { ConditionalRender } from './Components/ConditionalRender';
import { Card } from './components/Card.jsx';
import { ToggleVisibility } from './components/ToggleVisibility.jsx';
import { UserList } from './Components/UserList.jsx';
import { ConditionalRenderAdvanced } from './Components/ConditionalRenderAdvanced.jsx';
import './App.css'

function App() {
  const isLoggedIn = true;
  const myUserRole = 'user';
  const nombres = ['Isaias', 'Marta', 'Carlos', 'Messi', 'Arturito'];
  const myUserList = [{
    id: 1,
    nombre: 'Isaias'
  },{
    id: 2,
    nombre: 'Marcos'
  },{
    id: 3,
    nombre: 'Messi'
  },{
    id: 4,
    nombre: 'Ñoño'
  } ];	
  return (
    <>
      <article className="App">
                 {/* Ejercicio 1*/}
        <Ejercicio1 isLoggedIn={isLoggedIn}/>
        <br></br>{/* Ejercicio 2*/}
        <Ejercicio2 nombres={nombres}/>
        <br></br>{/* Ejercicio 3*/}
        <Ejercicio3/>
        <br></br>{/* Ejercicio 4*/}
        <Ejercicio4 />
        <br></br>{/* Ejercicio 6*/}
        <CustomButton color="Blue" texto="MiBoton" onClick={() => console.log("Boton pulsado")} />
        <br></br>{/* Ejercicio 7*/}
        <ConditionalRender condition={true} />
        <br></br>{/* Ejercicio 8*/}
        <Card title="carta" body="cuerpo de la carta" footer='footer'/>
        <br></br>{/* Ejercicio 9*/}
        <ToggleVisibility/>
        <br></br>{/* Ejercicio 10*/}
        <UserList list={myUserList}/>
        <br></br>{/* Ejercicio 11*/}
        <ConditionalRenderAdvanced isLoggedIn={isLoggedIn} userRole={myUserRole}  />
      </article>
    </>
    
  )
}

export default App;
