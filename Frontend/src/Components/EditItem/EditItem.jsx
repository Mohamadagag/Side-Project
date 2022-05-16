import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import axios from 'axios'
import './EditItem.css'

export default class EditItem extends Component {
    constructor(props){
        super(props);
        this.state = {
          name: '',
          price: '',
          description: '',
          image: '',
        }
      }
    
      handleInput = (e) => {
        this.setState({
          [e.target.name]: e.target.value
        })
      }
    
      saveItem = async (e) => {
        e.preventDefault();
        const expense = {
          name: this.state.name,
          price: this.state.price,
          description: this.state.description,
          image: this.state.image
        };
        axios.post('http://127.0.0.1:8000/api/items',expense)
        .then(res => console.log(res.data));
        this.setState({name: '', price: '', description: '',image:''});
      }
    
  render() {
    return (
      <>
      <h1>EDIT</h1>
        <div className="AddItem-container">
           <div className='AddItem-sub-container'>            
             <form onSubmit={this.saveItem}>
               <div className='form-group'>
                 <div className='addItemField'>
                   <label>Item name</label><br/>
                   <input type='text' name='name' onChange={this.handleInput} value={this.state.name} placeholder='Enter item name' className='add'/>
                 </div>
                 <div className='addItemField'>
                   <label>Item Price</label><br/>
                   <input type='text' name='price' onChange={this.handleInput}  value={this.state.price} placeholder='Enter item price' className='add'/>
                 </div>
                 <div className='addItemField'>
                   <label>Item description</label><br/>
                   <input type='text' name='description' onChange={this.handleInput} value={this.state.description} placeholder='Enter item description' className='add'/>
                 </div>
                 <div className='addItemField'>
                   <label>Item image</label><br/>
                   <input type='text' name='image' onChange={this.handleInput} value={this.state.image} placeholder='Enter item image' className='add'/>
                 </div>
               </div>
               <div className=''>
                     <button type='submit'>Save</button>
                       <Link to={'/'} className="ba-btn btn">Back</Link>
                 </div>  
             </form>                  
           </div>
       </div>
      </>
    )
  }
}
