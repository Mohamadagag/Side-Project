import React from 'react'
import { Link } from 'react-router-dom'
import './Item.css'

function Product(props) {

  handleDelete = (id) => {
    axios.delete(`http://127.0.0.1:8000/api/deleteItem/${id}`)
  }

  return (
    <div className='product-container'>
          <div className='product-image'>
                    <img src='https://via.placeholder.com/200x200' alt='product' />
                </div>
                <div className='product-details'>
                    <div className='product-title'>
                        <h3>{props.name}</h3>
                    </div>
                    <div className='product-price'>
                        <h3>${props.price}</h3>
                    </div>
                    <div className='description'>
                        <p>{props.description}</p>
                    </div>
                    <div className='actions'>
                    <Link to={'edit-item'} className='edit btn'>Edit Item</Link>                     
                      <button className='delete btn' onClick={() => handleDelete}>delete</button>                      
                    </div>
                 </div>
      
    </div>
  )
}

export default Product
