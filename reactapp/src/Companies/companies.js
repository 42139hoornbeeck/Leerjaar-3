import './companies.css'
import { Table } from "antd";
import { useState, useEffect } from "react";
import axios from "axios";

function Companies() {
  const [dataSource, setDataSource] = useState([]);
  const [totalPages, setTotalPages] = useState(1);
  const [loading, setLoading] = useState(false);

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
  ];

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

  return (
    <div
      style={{
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
      }}
    >
      <Table
        id={"customers"}
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
    </div>
  );
}
export default Companies;