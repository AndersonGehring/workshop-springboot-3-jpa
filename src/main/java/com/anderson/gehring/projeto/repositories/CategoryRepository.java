package com.anderson.gehring.projeto.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import com.anderson.gehring.projeto.entities.Category;

public interface CategoryRepository extends JpaRepository<Category, Long>{

}
