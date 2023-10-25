package com.anderson.gehring.projeto.repositories;

import org.springframework.data.jpa.repository.JpaRepository;

import com.anderson.gehring.projeto.entities.User;

public interface UserRepository extends JpaRepository<User, Long>{

}
