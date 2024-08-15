import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { Table, Button, Form, Modal, Alert } from 'react-bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import './LeaveRequests.css';


// Component Definition and State Initialization / innitialize variables
const LeaveRequests = () => {
  const [leaveRequests, setLeaveRequests] = useState([]);
  const [showModal, setShowModal] = useState(false);
  const [currentRequest, setCurrentRequest] = useState({
    id: '',
    employee_name: '',
    leave_type: '',
    start_date: '',
    end_date: '',
    reason: '',
  });
  const [currentPage, setCurrentPage] = useState(1);
  const [requestsPerPage, setRequestsPerPage] = useState(10);
  const [modalError, setModalError] = useState(null);
  const [globalError, setGlobalError] = useState(null);
  const [successMessage, setSuccessMessage] = useState(null);

  useEffect(() => {
    fetchLeaveRequests();    // fetches data
    handleResize(); // Check screen size on component mount
    window.addEventListener('resize', handleResize); // Update on resize

    return () => {
      window.removeEventListener('resize', handleResize); // Clean up
    };
  }, []);

  const handleResize = () => {
    if (window.innerWidth <= 576) {
      setRequestsPerPage(5); // Show fewer rows on small screens
    } else {
      setRequestsPerPage(10); // Show more rows on larger screens
    }
  };

  // gets leave requests from laravel api located in routes
  const fetchLeaveRequests = async () => {
    try {
      const response = await axios.get('http://localhost:8000/api/leave-requests');
      setLeaveRequests(response.data);
      setGlobalError(null);
    } catch (error) {
      setGlobalError('Failed to fetch leave requests. Please try again later.');
    }
  };
// handles input I need to do more research on how exactly
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setCurrentRequest({ ...currentRequest, [name]: value });
  };

  const validateDates = () => {
    const today = new Date().toISOString().split('T')[0];
    if (currentRequest.start_date < today) {
      setModalError('Start date cannot be in the past.');
      return false;
    }
    if (currentRequest.end_date < currentRequest.start_date) {
      setModalError('End date cannot be before the start date.');
      return false;
    }
    setModalError(null);
    return true;
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (!validateDates()) return;

    try {
      const url = currentRequest.id ? `http://localhost:8000/api/leave-requests/${currentRequest.id}` : 'http://localhost:8000/api/leave-requests';
      const method = currentRequest.id ? 'put' : 'post';
      const response = await axios[method](url, currentRequest);

      if (response.status >= 200 && response.status < 300) {
        setSuccessMessage(currentRequest.id ? 'Leave request updated successfully.' : 'Leave request added successfully.');
        setShowModal(false);
        fetchLeaveRequests();
        setTimeout(() => setSuccessMessage(null), 3000); // Clear success message after 3 seconds
      }
    } catch (error) {
      if (error.response && error.response.data && error.response.data.errors) {
        // Parse and join error messages
        const errors = Object.values(error.response.data.errors).flat();
        setModalError(errors.join(', '));
      } else {
        setModalError('Failed to submit leave request. Please check your input and try again.');
      }
    }
  };

  const handleEdit = (request) => {
    setCurrentRequest(request);
    setShowModal(true);
  };

  const handleDelete = async (id) => {
    try {
      await axios.delete(`http://localhost:8000/api/leave-requests/${id}`);
      setSuccessMessage('Leave request deleted successfully.');
      fetchLeaveRequests();
      setTimeout(() => setSuccessMessage(null), 3000); // Clear success message after 3 seconds
    } catch (error) {
      setGlobalError('Failed to delete leave request. Please try again later.');
    }
  };

  const handleShowModal = () => {
    setCurrentRequest({
      id: '',
      employee_name: '',
      leave_type: '',
      start_date: '',
      end_date: '',
      reason: '',
    });
    setShowModal(true);
  };

  const handleCloseModal = () => {
    setShowModal(false);
    setModalError(null); // Clear errors when closing the modal
  };

  const handlePageChange = (pageNumber) => setCurrentPage(pageNumber);

  // Pagination logic
  const indexOfLastRequest = currentPage * requestsPerPage;
  const indexOfFirstRequest = indexOfLastRequest - requestsPerPage;
  const currentRequests = leaveRequests.slice(indexOfFirstRequest, indexOfLastRequest);

  const handleBackToLaravel = () => {
    window.location.href = 'http://127.0.0.1:8000'; // Redirect to the Laravel welcome page
  };

  return (
    <div className="container mt-5">
      <h1 className="text-center mb-4">Leave Requests</h1>
      <div className="d-flex justify-content-between mb-3">
        <Button variant="primary" onClick={handleShowModal}>Add Leave Request</Button>
        <Button variant="secondary" onClick={handleBackToLaravel}>Back Home</Button>
      </div>

      {/* Global Error and Success Messages */}
      {globalError && <Alert variant="danger">{globalError}</Alert>}
      {successMessage && <Alert variant="success">{successMessage}</Alert>}

      <div className="table-responsive">
        <Table striped bordered hover className="leave-requests-table">
          <thead>
            <tr>
              <th>Employee Name</th>
              <th className="d-none d-sm-table-cell">Leave Type</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th className="d-none d-md-table-cell">Reason</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            {currentRequests.map((request) => (
              <tr key={request.id}>
                <td className="important-width">{request.employee_name}</td>
                <td className="d-none d-sm-table-cell">{request.leave_type}</td>
                <td>{new Date(request.start_date).toLocaleDateString()}</td>
                <td>{new Date(request.end_date).toLocaleDateString()}</td>
                <td className="d-none d-md-table-cell">{request.reason}</td>
                <td>
                  <Button variant="primary" size="sm" onClick={() => handleEdit(request)}>Edit</Button>
                  <Button variant="danger" size="sm" onClick={() => handleDelete(request.id)}>Delete</Button>
                </td>
              </tr>
            ))}
          </tbody>
        </Table>
      </div>

      {/* Pagination */}
      <div className="d-flex justify-content-center mt-4">
        <nav>
          <ul className="pagination">
            {[...Array(Math.ceil(leaveRequests.length / requestsPerPage)).keys()].map((page) => (
              <li key={page + 1} className={`page-item ${currentPage === page + 1 ? 'active' : ''}`}>
                <a onClick={() => handlePageChange(page + 1)} className="page-link">
                  {page + 1}
                </a>
              </li>
            ))}
          </ul>
        </nav>
      </div>

      {/* Modal for Add/Edit */}
      <Modal show={showModal} onHide={handleCloseModal}>
        <Modal.Header closeButton>
          <Modal.Title>{currentRequest.id ? 'Edit Leave Request' : 'Add Leave Request'}</Modal.Title>
        </Modal.Header>
        <Modal.Body>
          {modalError && <Alert variant="danger">{modalError}</Alert>}
          <Form onSubmit={handleSubmit}>
            <Form.Group className="mb-3">
              <Form.Label>Employee Name</Form.Label>
              <Form.Control
                type="text"
                name="employee_name"
                value={currentRequest.employee_name}
                onChange={handleInputChange}
                required
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Leave Type</Form.Label>
              <Form.Control
                type="text"
                name="leave_type"
                value={currentRequest.leave_type}
                onChange={handleInputChange}
                required
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>Start Date</Form.Label>
              <Form.Control
                type="date"
                name="start_date"
                value={currentRequest.start_date}
                onChange={handleInputChange}
                required
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label>End Date</Form.Label>
              <Form.Control
                type="date"
                name="end_date"
                value={currentRequest.end_date}
                onChange={handleInputChange}
                required
              />
            </Form.Group>
            <Form.Group className="mb-3">
              <Form.Label className="d-none d-md-block">Reason</Form.Label>
              <Form.Control
                as="textarea"
                rows={3}
                name="reason"
                value={currentRequest.reason}
                onChange={handleInputChange}
                required
                className="d-none d-md-block"
              />
            </Form.Group>
            <Button variant="primary" type="submit">
              {currentRequest.id ? 'Update' : 'Add'}
            </Button>
          </Form>
        </Modal.Body>
      </Modal>
    </div>
  );
};

export default LeaveRequests;
