import './companies.css'
import { useState, useEffect } from "react";
import axios from "axios";
import { Table } from "antd";
import { EditOutlined, DeleteOutlined } from "@ant-design/icons";
import '../Modals/deleteModal.css';


function Companies() {
  const [dataSource, setDataSource] = useState([]);
  const [totalPages, setTotalPages] = useState(1);
  const [loading, setLoading] = useState(false);
  const [openModal, setOpenModal] = useState(false);
  const [id, setId] = useState([]);
  const [name, setName] = useState([]);

  useEffect(() => {
    fetchRecords(1);
  }, []);

  const columns = [
    {
      title: "ID",
      dataIndex: "id",
    },
    {
      title: "Name",
      dataIndex: "name",
    },
    {
        title: "Actions",
        dataIndex: "id",
        render: (id, data) => {
          return (
            <>
            <EditOutlined
                className={"editButton"}
                onClick={() => {
                    onEditCompany(id);
                }}
              /> 

            <DeleteOutlined
              className={"deleteButton"}
              onClick={() => {setOpenModal(true); setId(id); setName(data.name); }}
            />                     
            </>
          );
        },
    },
    
  ];

  const onEditCompany = (id) => {
    console.log(id);
  };

  const handleDelete = (id) => {
    axios.delete(`http://127.0.0.1:8000/api/companies/${id}`)
    .then((res) => {
      const newData = dataSource.filter(c => {
        return c.id !== id;
      })
      setDataSource(newData);
    });
  };

  const fetchRecords = (page) => {
    setLoading(true);
    axios
      .get(`http://127.0.0.1:8000/api/companies?page=${page}`)
      .then((res) => {
        setDataSource(res.data.data);
        setTotalPages(res.data.meta.total);
        setLoading(false);
      });
  };

  
  const Modal = ({ open, onClose }) => {
    if (!open) return null;
    return (
      <div onClick={onClose} className='overlay'>
        <div
          onClick={(e) => {
            e.stopPropagation();
          }}
          className='modalContainer'
        >
          <div className='modalRight'>
            <p className='closeBtn' onClick={onClose}>
              X
            </p>
            <div className='content'>
              <h1>Wil je het bedrijf "{name}" verwijderen?</h1>
            </div>
            <div className='btnContainer'>
              <button onClick={onClose} className='btnPrimary'>
                  <span className='bold'>Annuleren</span>
              </button>
              <button onClick={() => {handleDelete(id); setOpenModal(false); }} className='btnOutline'>
                  <span className='bold'>Verwijderen</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    );
  };

  return (
    <div
      style={{
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
      }}
    >
      <Table
        loading={loading}
        columns={columns}
        dataSource={dataSource}
        pagination={{
          total: totalPages,
          onChange: (page) => {
            fetchRecords(page);
          },
        }}
    ></Table>

    <div>
      <Modal open={openModal} onClose={() => setOpenModal(false)} />
    </div>

    </div>
  );
}
export default Companies;