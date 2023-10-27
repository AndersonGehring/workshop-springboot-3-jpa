package com.anderson.gehring.projeto.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import com.anderson.gehring.projeto.entities.OrderItem;

public interface OrderItemRepository extends JpaRepository<OrderItem, Long>{

}
