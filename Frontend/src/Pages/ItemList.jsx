import React, { Component } from 'react'
import "./ItemList.css"
import Item from '../Components/Item/Item'
import axios from "axios";
import { Link } from 'react-router-dom';

export default class ItemList extends Component {

  constructor(props) {
    super(props);
    this.state = {
      items: [],
      loading : true,
    };
  }
      async  componentDidMount(){
        let res = await axios.get('http://127.0.0.1:8000/api/items');
        // console.log(res.data.data);
        if(res.data.status === 201){
            this.setState({
              items : res.data.data,
              loading : false,
            });
        }
      }


  render() {

    if(this.state.loading === true){
      return <div>Loading...</div>
    }else{
      return (
        <>
        <div className='Add-new'>
              <Link to={'add-item'} className="add-btn">Add Item</Link>
              </div>
          <div className='container'>            
            <div className="product">
              {this.state.items.map(item => (
                <Item 
                  key={item.id}
                  name = {item.name}
                  price = {item.price}
                  description = {item.description}
                />
              ))}
              
            </div>
          </div>
        </>
      );
    
    }
  }
}