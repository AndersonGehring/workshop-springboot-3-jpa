package com.anderson.gehring.projeto.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import com.anderson.gehring.projeto.entities.Order;

public interface OrderRepository extends JpaRepository<Order, Long>{

}
