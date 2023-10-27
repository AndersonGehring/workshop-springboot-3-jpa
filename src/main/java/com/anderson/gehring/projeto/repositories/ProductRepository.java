package com.anderson.gehring.projeto.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import com.anderson.gehring.projeto.entities.Product;

public interface ProductRepository extends JpaRepository<Product, Long>{

}
