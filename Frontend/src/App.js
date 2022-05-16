import {BrowserRouter, Routes, Route} from 'react-router-dom';
import ItemList from './Pages/ItemList';
import AddItem from './Components/AddItem/AddItem';
import EditItem from './Components/EditItem/EditItem';

function App() {
  return (
    <BrowserRouter>
      <Routes>
      <Route path="/" element={<ItemList />} />
      <Route path="/add-item" element={<AddItem />} />
      <Route path="/edit-item" element={<EditItem />} />
      </Routes> 
    </BrowserRouter>
  );
}

export default App;
