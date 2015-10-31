<?php

class Domains_model extends CI_Model {

function get_domain($domain)
	{
		$query = $this->db->query("SELECT * FROM domains WHERE domain = '$domain'");
		return $query->result_array();
	}
	
function get_domains()
	{
		$query = $this->db->query("SELECT * FROM domains");
		return $query->result_array();
	}
	
function set_domain($domain)
	{
		$this->db->query("INSERT INTO domains (domain) VALUES ('$domain')");
		$id = $this->db->insert_id();
		return $id;
	}
	
function update_domain($domain, $visits)
	{
		$this->db->query("UPDATE domains SET visits = $visits WHERE domain = '$domain'");
	}
	
function get_uri()
	{
		$query = $this->db->query("SELECT * FROM uri_requests");
		return $query->result_array();
	}

function set_uri($uri1, $position, $id)
	{
		$query = $this->db->query("INSERT INTO uri_requests (uri, position, domain_id) VALUES ('$uri1', $position, $id)");
	}

function update_uri($uri1, $count, $position)
	{
		$this->db->query("UPDATE uri_requests SET count = $count WHERE uri = '$uri1' AND position = $position AND domain_id = $id");
	}
function get_uris_id($id)
	{
		$query = $this->db->query("SELECT uri FROM uri_requests WHERE domain_id = $id");
		return $query->result_array();
	}
}