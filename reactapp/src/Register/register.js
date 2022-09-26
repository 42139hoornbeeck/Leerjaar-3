import { useState } from "react";

function Register() {

    const [name, setName] = useState('');
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [message, setMessage]= useState('');

    const handleSubmit = async (event) => {
        event.preventDefault();

        const response = await fetch('http://localhost:8000/api/auth/register', {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            method: 'post',
            body: JSON.stringify({
                name: name,
                email: email,
                password: password,
            })
        })
        
        const json = await response.json();
        const message = json.message;

        setMessage(message);
 
    }



  return (
    <div className="flex mt-5 justify-center">
        <div className="w-full max-w-xs">
            <form onSubmit={e=> {handleSubmit(e)}}  className="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div className="mb-4">
                <label className="block text-gray-700 text-left font-bold mb-2">
                    Name
                </label>
                <input onChange={e=> setName(e.target.value)} value={name} className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Naam"/>
                </div>
                <div className="mb-4">
                <label className="block text-gray-700 text-left font-bold mb-2">
                    Email
                </label>
                <input onChange={e=> setEmail(e.target.value)} value={email} className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email"/>
                </div>
                <div className="mb-4">
                <label className="block text-gray-700 text-left font-bold mb-2">
                    Password
                </label>
                <input onChange={e=> setPassword(e.target.value)}  value={password} className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Password"/>
                </div>
                <div className="flex items-center justify-between">
                <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Register
                </button>
                message: {message}
                </div>
            </form>
        </div>
    </div>
    
  );
}

export default Register;
