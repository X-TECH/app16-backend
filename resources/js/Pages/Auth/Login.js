import React from "react";
import styled from "styled-components";

const Test = styled.p`
  color: gray;
  font-size: 2em;
  font-family: sans-serif;
`;

const Login = props => {
  const foo = "bar";
  return <Test>{JSON.stringify({ ...props, foo })}</Test>;
};

export default Login;
