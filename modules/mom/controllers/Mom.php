<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mom extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mom_model');
    }

    public function index($project_id = '')
    {
        if (!has_permission('mom', '', 'view')) {
            access_denied('mom');
        }
        $data['project_id'] = $project_id;
        $data['title']      = _l('mom_module');
        $data['mom_notes']  = $this->mom_model->get_by_project($project_id);
        $this->load->view('list', $data);
    }

    public function add($project_id)
    {
        if (!has_permission('mom', '', 'create')) {
            access_denied('mom');
        }
        if ($this->input->post()) {
            $id = $this->mom_model->add($project_id, $this->input->post());
            if ($id) {
                set_alert('success', _l('added_successfully', _l('mom')));
                redirect(admin_url('mom/index/' . $project_id));
            }
        }
        $data['project_id'] = $project_id;
        $data['title']      = _l('add_new', _l('mom'));
        $this->load->view('form', $data);
    }

    public function edit($id)
    {
        if (!has_permission('mom', '', 'edit')) {
            access_denied('mom');
        }
        if ($this->input->post()) {
            $success = $this->mom_model->update($id, $this->input->post());
            if ($success) {
                set_alert('success', _l('updated_successfully', _l('mom')));
            }
            redirect(admin_url('mom/edit/' . $id));
        }
        $data['mom']  = $this->mom_model->get($id);
        $data['title'] = _l('edit', _l('mom'));
        $this->load->view('form', $data);
    }

    public function delete($id)
    {
        if (!has_permission('mom', '', 'delete')) {
            access_denied('mom');
        }
        $project = $this->mom_model->get($id)->project_id;
        if ($this->mom_model->delete($id)) {
            set_alert('success', _l('deleted', _l('mom')));
        }
        redirect(admin_url('mom/index/' . $project));
    }

    public function public_view($hash)
    {
        $mom = $this->mom_model->get_by_hash($hash);
        if (!$mom) {
            show_404();
        }
        $data['mom']   = $mom;
        $data['title'] = _l('mom');
        $this->load->view('public', $data);
    }
}
