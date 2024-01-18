import { Ejercicio1 } from './ejercicios/ejercicio1';
import { Ejercicio2 } from './ejercicios/Ejercicio2';
import { Ejercicio3 } from './ejercicios/Ejercicio3';
import { Ejercicio4 } from './ejercicios/Ejercicio4';
import './App.css'

function App() {
  const isLoggedIn = false;
  const nombres = ['Isaias', 'Marta', 'Carlos', 'Messi', 'Arturito'];
  return (
    <>
      <Ejercicio4 />
      <article className="App">
        <Ejercicio1 isLoggedIn={isLoggedIn}/>
        <Ejercicio2 nombres={nombres}/>
        <Ejercicio3/>
      </article>
    </>
    
  )
}

export default App;
