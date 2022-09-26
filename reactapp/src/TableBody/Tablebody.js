import { useState, useEffect } from "react";
import axios from 'axios';

function Tablebody() {
    const [companies, setCompanies] = useState([]);
    
    const baseURL = "http://127.0.0.1:8000/api/companies";

    useEffect(() => {
        axios.get(baseURL).then((response) => {
            setCompanies(response.data.data);
        });
    }, []);

    
    return (
        <tbody>
        {companies.map((company, index) => {
            return(
                <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700" key={index}>
                    <th scope="row" className="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {company.id}
                    </th>
                    <th scope="row" className="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {company.name}
                    </th>
                </tr>
            );
        })
    }
        </tbody>

        
    );
}
  
  export default Tablebody;